document.getElementById("chatForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    let message = document.getElementById("message").value;

    let res = await fetch("/chat.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "message=" + encodeURIComponent(message)
    });

    let text = await res.text();

    document.getElementById("chatBox").innerHTML += `
        <div><b>Vous:</b> ${message}</div>
        <div><b>IA:</b> ${text}</div><hr>
    `;
});