function clearFields() {
    var titleInput = document.getElementById('title');
    var contentInput = document.getElementById('content');
    if (confirm("Are you sure you want to clear the inputs?")) {
        titleInput.value = '';
        contentInput.value = '';
    }
}

function validateForm(event) {
    var title = document.getElementById("title").value;
    var content = document.getElementById("content").value;

    if (title === "" && content === "") {
        event.preventDefault();
        alert("Title and post cannot be blank.");
        document.getElementById('title').classList.add('missing-field');
        document.getElementById('content').classList.add('missing-field');
    } else if (title === "") {
        event.preventDefault();
        alert("Title cannot be blank.");
        document.getElementById('title').classList.add('missing-field');
        document.getElementById('content').classList.remove('missing-field');
    } else if (content === "") {
        event.preventDefault();
        alert("Post cannot be blank.");
        document.getElementById('title').classList.remove('missing-field');
        document.getElementById('content').classList.add('missing-field');
    }
}