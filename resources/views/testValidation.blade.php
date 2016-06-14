<!DOCTYPE html>
<html>
<head>
<script src="/js/jquery.min-2.1.3.js"></script>
<script>
$(document).ready(function(){
	console.log("dfsfsd");

    $("button").click(function(){
        $("p").hide();
    });
});

</script>
</head>
<body>

<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<button>Click me to hide paragraphs</button>

</body>
</html>

