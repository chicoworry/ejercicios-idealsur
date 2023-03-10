<?php
    require_once "db.php";

    $GENDERS = ["H" => "Hombre", "M" => "Mujer"];
    $ROLES = ["1" => "馃帗 Alumno", "2" => "馃搹 Docente", "3" => "馃憫 Director"];
    $message = "";
    $action_message = "";
    $message_type = "";
    $query = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $role = intval($_POST["role"]);
        $age = intval($_POST["age"]);
        $gender = $_POST["gender"];

        switch($_POST["action"]) {
            case "create":
                $query = "INSERT INTO usuarios(NOMBRE, EDAD, SEXO, ROLID) VALUES ('$name', '$age', '$gender', '$role')";
                $message = 'Se cre贸 exitosamente el usuario';
                $action_message = "la creaci贸n";
                break;
            case "update":
                $query = "UPDATE usuarios SET NOMBRE='$name', EDAD=$age, SEXO='$gender', ROLID=$role WHERE ID=$id";
                $message = 'Se actualiz贸 correctamente el usuario';
                $action_message = "la actualizaci贸n";
                break;
            case "delete":
                $query = "DELETE FROM usuarios WHERE ID=$id";
                $message = 'Se elimin贸 correctamente el usuario';
                $action_message = "el borrado";
                break;
        }

        $result = $mysqli->query($query);

        if(!$result) {
            $message = "Fall贸 ".$action_message." del usuario.";
            $message_type = 'error';
        }

        $message_type = 'success';
    }
?>

<?php include('includes/header.php'); ?>
<body class="bg-rose-100">
    <main>
        <div class="font-bold text-3xl text-center p-10">Ejercicio 3 - CRUD</div>
        <?php if (!empty($message)) { ?>
            <div class="flex justify-center my-5">
                <div class="
                    <?php echo($message_type == "success" ? "bg-indigo-800" : "bg-red-800" )?>
                    font-bold text-white p-4 border border-black rounded-md"
                >
                    <?php echo($message) ?>
                </div>
            </div>
        <?php } ?>
        <div class="flex">
            <!-- Table of users from DB -->
            <div class="mx-auto">
                <div class="font-semibold text-xl text-center mb-5">Listado de usuarios - <a href="charts.php" class="text-indigo-600 border-b border-indigo-600 pb-0.5">Ver gr谩ficos</a></div>
                <table class="table-auto w-full">
                    <thead class="border border-slate-400 bg-slate-100">
                        <tr class="text-left">
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Edad</th>
                            <th class="px-6 py-3">G茅nero</th>
                            <th class="px-6 py-3">Rol</th>
                        </tr>
                    </thead>
                    <tbody class="border border-slate-400">
                        <?php
                            $result = $mysqli->query("SELECT * FROM usuarios");

                            while($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td class="px-6 py-3"><?php echo($row['ID']); ?></td>
                                <td class="px-6 py-3">
                                    <a
                                        href="user.php?id=<?php echo($row['ID']); ?>"
                                        class="text-blue-600 border-b border-blue-600 pb-0.5"
                                    >
                                        <?php echo($row['NOMBRE']); ?>
                                    </a>
                                </td>
                                <td class="px-6 py-3"><?php echo($row['EDAD']." a帽os"); ?></td>
                                <td class="px-6 py-3"><?php echo($GENDERS[$row['SEXO']]); ?></td>
                                <td class="px-6 py-3"><?php echo($ROLES[$row['ROLID']]); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Create user form -->
            <div class="mx-auto">
                <div class="font-semibold text-xl text-center mb-5">Crear usuario</div>
                <form action="/" method="POST" autocomplete="off">
                    <div class="flex gap-2 mb-3">
                        <div class="flex flex-col w-1/2">
                            <label for="name" class="mb-2">Nombre</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label for="role" class="mb-2">Rol</label>
                            <select name="role" id="role" required>
                                <option value="" disabled selected>Funci贸n que tendr谩</option>
                                <option value="1">馃帗 Alumno</option>
                                <option value="2">馃搹 Docente</option>
                                <option value="3">馃憫 Director</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-2 mb-5">
                        <div class="flex flex-col w-1/2">
                            <label for="gender" class="mb-2">G茅nero</label>
                            <select name="gender" id="gender" required>
                                <option value="" disabled selected>Se autopercibe</option>
                                <option value="H">馃懆 Hombre</option>
                                <option value="M">馃懇 Mujer</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label for="age" class="mb-2">Edad</label>
                            <input type="number" id="age" name="age" required>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button
                            type="submit"
                            name="action"
                            value="create"
                            class="
                                bg-green-600 hover:bg-green-700
                                border border-black rounded-md
                                text-white p-2"
                        >
                            馃捑 Agregar usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-black text-white flex justify-center p-5 mt-10">
    </footer>
</body>
</html>