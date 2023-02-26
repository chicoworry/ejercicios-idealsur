document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('/users.php', {
            method: 'GET',
        });
    } catch {

    }
});