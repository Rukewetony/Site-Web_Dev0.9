    <?= $this->Html->script([
        '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
        'http://ironsummitmedia.github.io/startbootstrap-sb-admin/js/plugins/morris/morris.min.js',
        'http://ironsummitmedia.github.io/startbootstrap-sb-admin/js/plugins/morris/morris-data.js',
        'http://ironsummitmedia.github.io/startbootstrap-sb-admin/js/bootstrap.min.js',
        'http://rawgit.com/Alex-D/Trumbowyg/2.0.0-beta.4/dist/trumbowyg.min.js',
    ]); ?>

    <?= $this->Html->script('comment.js'); ?>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script type="text/javascript">
        $('#trumbowyg').trumbowyg({
            lang: 'fr',
            btnsDef: {
                // Customizables dropdowns
                image: {
                    dropdown: ['insertImage', 'upload', 'base64'],
                    ico: 'insertImage'
                }
            },
            btns: ['btnGrp-design',
                '|', 'link',
                '|', 'image',
                '|', 'btnGrp-lists',
                '|', 'horizontalRule']
        });
    </script>

</body>
</html>
