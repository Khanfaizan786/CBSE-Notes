function sendId(btn) {
    localStorage.setItem("myValue",btn);
    window.location.href="topics.php?class="+btn;
}