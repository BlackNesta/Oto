<?php

header('Content-type: text/xml');
$servername = "localhost";
$username = "client";
$password = "client";
$data_base = "otodb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $data_base);
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<rss version='2.0'>\n";
echo "<channel>\n";

echo "<title>Most popular products</title>\n";
echo "<description>Online toys rss feed</description>\n";
echo "<link>http://localhost/main.php</link>\n";
$result_produse = mysqli_query($conn, "SELECT id, nume, categorie, vandute FROM produse ORDER BY vandute desc");

if (mysqli_num_rows($result_produse) > 0) {
    while ($produs = mysqli_fetch_assoc($result_produse)) {
        $result_img = mysqli_query($conn, "SELECT img1 FROM imagini_produs where id_produs='" . $produs["id"] . "'");
        $img_prd = mysqli_fetch_assoc($result_img);

        echo '<item>
                <title>' . $produs["nume"] . '</title>
                <link>produs.php?id=' . $produs["id"] . '</link>
                <categorie>' . $produs["categorie"] . '</categorie>
                <vandute>' . $produs["vandute"] . '</vandute>
            </item>';
    }
}

mysqli_close($conn);
echo "</channel>\n";
echo "</rss>\n";
