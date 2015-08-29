    <?= $this->Html->script([
        'https://code.jquery.com/jquery-2.1.4.min.js',
        'https://rawgit.com/nathco/jQuery.scrollSpeed/master/jQuery.scrollSpeed.js',
        'http://rawgit.com/Alex-D/Trumbowyg/2.0.0-beta.4/dist/trumbowyg.min.js',
        'app.js'
    ]); ?>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script type="text/javascript">
        $('#trumbowyg').trumbowyg({
            fullscreenable: true,
            btnsDef: {
                // Customizables dropdowns
                image: {
                    dropdown: ['insertImage', 'upload', 'base64'],
                    ico: 'insertImage'
                }
            },
            btns: [
                'bold', 'italic', '|', 'link',
                '|', 'image'
            ]
        });
    </script>

</body>
</html>
