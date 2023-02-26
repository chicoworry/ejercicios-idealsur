<?php
    include("db.php");

    $ROLES = ["1" => "🎓 Alumno", "2" => "📏 Docente", "3" => "👑 Director"];
    $GENDERS = ["H" => "👨 Hombre", "M" => "👩 Mujer"];

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM usuarios WHERE ID=$id");
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
    }
?>

<?php include('includes/header.php'); ?>
<body class="bg-rose-100">
    <main>
        <div class="font-bold text-3xl text-center p-10">Ejercicio 3 - CRUD</div>
        <div class="flex justify-center">
            <div>
                <div class="font-semibold text-xl text-center mb-5">Datos del usuario</div>
                <form action="/" method="POST" autocomplete="off">
                    <div class="flex gap-2 mb-3">
                        <div class="flex flex-col w-1/2">
                            <label for="name" class="mb-2">Nombre</label>
                            <input type="text" id="name" name="name" required value="<?php echo($row["NOMBRE"]); ?>">
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label for="role" class="mb-2">Rol</label>
                            <select name="role" id="role" required>
                                <option value="" disabled>Función que tendrá</option>
                                <?php foreach($ROLES as $role_id => $role) { ?>
                                    <option value="<?php echo($role_id); ?>" <?php echo($role_id == $row["ROLID"] ? "selected" : ""); ?>><?php echo($role); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-2 mb-10">
                        <div class="flex flex-col w-1/2">
                            <label for="sign" class="mb-2">Género</label>
                            <select name="gender" id="gender" required>
                                <option value="" disabled>Se autopercibe</option>
                                <?php foreach($GENDERS as $gender_id => $gender) { ?>
                                    <option value="<?php echo($gender_id); ?>" <?php echo($gender_id == $row["SEXO"] ? "selected" : ""); ?>><?php echo($gender); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label for="age" class="mb-2">Edad</label>
                            <input type="number" id="age" name="age" required value="<?php echo($row["EDAD"]); ?>">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <a
                            href="/"
                            class="
                                bg-orange-400 hover:bg-orange-500
                                border border-black rounded-md
                                text-black p-2 mr-2"
                        >
                            📋 Volver al listado
                        </a>
                        <button
                            type="submit"
                            name="action"
                            value="update"
                            class="
                                bg-blue-600 hover:bg-blue-700
                                border border-black rounded-md
                                text-white p-2 mr-2"
                        >
                            🔃 Actualizar usuario
                        </button>
                        <button
                            type="submit"
                            name="action"
                            value="delete"
                            class="
                                bg-red-700 hover:bg-red-800
                                border border-black rounded-md
                                text-white p-2"
                        >
                            🔥 Eliminar usuario
                        </button>
                    </div>
                    <input type="hidden" id="id" name="id" value="<?php echo($row["ID"]); ?>">
                </form>
            </div>
        </div>
    </main>
</body>
</html>