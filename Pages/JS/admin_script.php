<script>
    reviewsNumber =
        <?php
        include "PHP/db_connection.php";
        $counter_result = mysqli_query(
            $conn,
            "SELECT count(*) as n FROM  recenzii_produs"
        );
        echo mysqli_fetch_assoc($counter_result)["n"];
        ?>;

    var offset = 0;
    const recenzii = document.getElementById("recenzii");

    InitReviewsTab();

    async function InitReviewsTab() {
        var scrollHeight = recenzii.scrollHeight;
        var clientHeight = recenzii.clientHeight;

        while (clientHeight >= scrollHeight && offset <= reviewsNumber) {
            await LoadReviews(0, 1, offset);
            offset += 1;
            scrollHeight = recenzii.scrollHeight;
            clientHeight = recenzii.clientHeight;
        }
    }

    function LoadReviews(id, n, offset) {
        return new Promise(resolve => {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("recenzii").innerHTML += this.responseText;
                    resolve();
                }
            };
            xhttp.open("GET", "PHP/get_reviews.php?id=" + id + "&n=" + n + "&offset=" + offset, true);
            xhttp.send();
        });
    }

    recenzii.addEventListener('scroll', () => {
        scrollHeight = recenzii.scrollHeight;
        clientHeight = recenzii.clientHeight;
        scrollTop = recenzii.scrollTop;
        if (clientHeight + scrollTop >= scrollHeight - 1) {
            LoadReviews(0, 3, offset);
            offset += 3;
        }
    });

    function deleteReview(id_review) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                document.getElementById("review-" + id_review).remove();
                InitReviewsTab();
            }
        };
        xhttp.open("GET", "PHP/delete_review.php?id_review=" + id_review, true);
        xhttp.send();
    }

    function displayComanda(slideIndex) {
        var i;
        var comanda = document.getElementsByClassName("detalii-comanda");
        var button = document.getElementsByClassName("btn-comanda")
        /*for (i = 0; i < comanda.length; i++) {
            comanda[i].style.display = "none";
        }*/
        if (comanda[slideIndex - 1].style.display == "block")
            comanda[slideIndex - 1].style.display = "none";
        else
            comanda[slideIndex - 1].style.display = "block";

        if (button[slideIndex - 1].textContent == "Vezi comanda")
            button[slideIndex - 1].textContent = "Ascunde comanda";
        else
            button[slideIndex - 1].textContent = "Vezi comanda"
    }
</script>