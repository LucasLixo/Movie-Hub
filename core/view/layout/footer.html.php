    </aside>
    <?php if (isset($js) && !empty($js)) : ?>
        <?php foreach ($js as $j) : ?>
            <script type="application/javascript" src="./resource/script/<?= $j ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script type="application/javascript" defer>
        $(document).ready(function() {
            // VIEW
            $('html').css({
                'display': 'block',
            });
        });
    </script>
</body>

</html>