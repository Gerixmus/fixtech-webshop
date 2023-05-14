<!-- product search -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("form1").submit(function(event){
            event.preventDefault();
            var search = $("#search").val();
            var submit = $("#submit").val();
            $(".form-message").load("index.php", {
                search: search,
                submit: submit
            });
        });
    });
</script>

<div class="product-search">
    <form class="form1" action="" method="$_GET">
        <input id="search" type="search" name="search" placeholder="">
        <input id="submit" type="submit" name="submit" value="Search" class="btn">
        <p class="form-message"></p>
    </form>
</div>