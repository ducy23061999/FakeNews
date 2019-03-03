
    <?php
    require_once __DIR__ .'/model/Info.php';
    $id = $_GET['id'];
    if (isset($id)){
        $oj = new Info();
        $status = $oj->Get_Data($id);

        if ($status){
                $text = <<<EOT
<meta property="og:title" content="$oj->title" />
<meta property="og:type" content="website" />
<meta property="og:description" content="$oj->decrip" />
<meta property="og:image" content="$oj->image" />
EOT;
            
           echo $text;
        }
    }
    ?>
<body>
    	<iframe src="https://giphy.com/embed/MqqZykfPyrKeY" width="480" height="349" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
</body>
</html>

