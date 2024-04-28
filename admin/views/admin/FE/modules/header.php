<script>
    function showContent(page) {
        var contentDiv = document.getElementsByClassName('content');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                contentDiv.innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "FE/"+ page + ".php", true);
        xhttp.send();
    }
</script>
<div class="header">
    ADMIN DASHBOARD
</div>