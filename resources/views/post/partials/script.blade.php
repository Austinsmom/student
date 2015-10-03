<script>

    (function ($) {

        $(document).ready(function () {

            $('.action').each(function () {
                $(this).prop('checked', false);
            });

            $('input[name=selected]').on('click', function () {

                if (this.checked) {
                    $('.action').each(function () {
                        //  this.checked = true;  // JS
                        $(this).prop('checked', true);
                    });
                } else {
                    $('.action').each(function () {
                        $(this).prop('checked', false);
                    });
                }
            });

            $('#form-dashboard').submit(function () {
                if ($('select[name=action]').val() == 'delete') {
                    var result = confirm("Confirm to delete post");
                    return result;
                }

                return true;

            });

        });

    })($);

</script>