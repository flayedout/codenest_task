<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
<script>
    $(function () {
        $("#datepick").datepicker({dateFormat: 'yy-mm-dd'});
    });


</script>

<script>
    $(function () {
        $('.cancel-submittion').on('click', function (e) {
            e.preventDefault();
            var id = ($(this).data('id'));
            if (id !== null && id !== "") {
                $.ajax({
                    type: "POST",
                    url: '/ajax/cancel',
                    data: {"id":id},
                    success: function (data) {
                        console.log(data);
                        window.location.href = "/list/delete/index";
                    },
                    dataType: "JSON"
                });
            }
        });

        $('.toggle-status').on('click',function () {
            var id = ($(this).data('id'));
            if($(this).is(':checked')){

                if (id !== null && id !== "") {
                    $.ajax({
                        type: "POST",
                        url: '/ajax/status/done',
                        data: {"id":id},
                        success: function (data) {

                            window.location.href = "/mytasks";
                        },
                        dataType: "JSON"
                    });
                }
            }
            else {
                if (id !== null && id !== "") {
                    $.ajax({
                        type: "POST",
                        url: '/ajax/status/undone',
                        data: {"id": id},
                        success: function (data) {

                            window.location.href = "/mytasks";
                        },
                        dataType: "JSON"
                    });
                }
            }
        })
    });

</script>
</body>
</html>