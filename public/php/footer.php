        <?php if (!endsWith($_SERVER["REQUEST_URI"], "index.php") && !endsWith($_SERVER["REQUEST_URI"], "/public/php/")): ?>
        <footer>
            <a href="index.php">
                Tillbaka
            </a>
        </footer>
        <?php endif; ?>
    </body>
</html>

<?php
function endsWith($haystack, $needle)
{
    $haystackLength = strlen($haystack);
    $needleLength = strlen($needle);
    if ($needleLength > $haystackLength)
        return false;
    return substr($haystack, $haystackLength - $needleLength, $needleLength) == $needle;
}
?>