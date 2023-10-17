<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#search-form").submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            var search = $("#search").val();

            // Use AJAX to fetch and display products
            $.ajax({
                url: "get_products.php",
                type: "GET",
                data: {
                    search: search
                },
                success: function(response) {
                    // Update the product listing with the retrieved data
                    $("#product-list").html(response);
                },
                error: function(xhr, status, error) {
                    console.log("AJAX request failed. Error: " + error);
                }
            });
        });
    });
</script>

<div class="search-section">
    <form class="search-content" id="search-form">
        <input id="search" type="search" name="search" placeholder="">
        <button type="submit" class="btn">Search</button>
    </form>
</div>