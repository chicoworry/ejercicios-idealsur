document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('numbers');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const number1 = Number(document.getElementById('number1').value);
        const number2 = Number(document.getElementById('number2').value);
        const sum = number1 + number2;
        const message = sum % 2 === 0 ? `${number1} + ${number2} = ${sum}\n\nThe resulting number is even` : `${number1} + ${number2} = ${sum}\n\nThe resulting number is odd`

        alert(message);
    });
});