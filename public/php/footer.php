        <footer>
            <?php if (!endsWith($_SERVER["REQUEST_URI"], "index.php")): ?>
                <a href="index.php">
                    Tillbaka
                </a>
            <?php endif; ?>
        </footer>
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