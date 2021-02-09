// AJAX to filter products async



$(document).ready(function () {

    filterProducts();

    function filterProducts() {

        // Show preloader on click of a checbox, because then the request is sent.
        $('#preloader').show();

        // Create vars for request, filter classnames, see function below
        let action = 'get_data';//name of form action
        let type = get_filter('product_type');
        let brand = get_filter('product_brand');
        let color = get_filter('product_color');

        // Sent AJAX request
        $.ajax({
            url: 'get_data.php', //url of destination
            method: 'POST', //method
            //what data needs to be sent (name: var)
            data: { action: action, type: type, brand: brand, color: color },
            // success response, activate function
            success: function (response) {
                // display in #results
                $('#results').html(response);
                // hide preloader
                $('#preloader').hide();
            }
        });
    }

    // get_filter function adds checked checkboxes in array filter[].
    // This is applied to each class of checkboxes

    function get_filter(classname) {

        // empty array
        let filter = [];
        // Activates push function for each checked box
        // :checked marks each checked or selected element
        $('.' + classname + ':checked').each(function () {
            filter.push($(this).val());
        });
        // retun array with elements
        return filter;
    }
    $('.product_checkbox').click(function () {

        filterProducts();
    });
});