$(document).ready(function (){
    // search post 
   $('body').on('click','#form-submit', function() {
        var search = $("#search").val();
        console.log(search);
        $.ajax({
            type: 'get',
            url: '/',
            data: {
                search: search
            },
            success: function(response) {
                console.log(response)
                $('#show-post').html(response.view);
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // sort by date 
    $('body').on('change','#sort', function() {
        var sort = $(this).val();
        console.log(sort);
        $.ajax({
            type: 'get',
            url: '/',
            data: {
                sort: sort
            },
            success: function(response) {
                console.log(response)
                $('#show-post').html(response.view);
            },
            error: function() {
                alert("Error");
            }
        });
    });


    // sort by authors
    $('body').on('change','#author_id', function() {
        var author_id = $(this).val();
        console.log(author_id);
        $.ajax({
            type: 'get',
            url: '/',
            data: {
                author_id: author_id
            },
            success: function(response) {
                console.log(response)
                $('#show-post').html(response.view);
            },
            error: function() {
                alert("Error");
            }
        });
    });


        // sort by authors
        $('body').on('click','.make-like', function() {
            var post_id = $(this).attr('attr');
            $.ajax({
                type: 'post',
                url: '/like',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    post_id: post_id
                },
                success: function(response) {
                    $('#like-count-'+post_id).text(response.likeCount)
                    if(response.active ==1){
                        $("#make-like-" + post_id).html(' <i class="fa  fa-heart like-icon"></i> ');
                    }else {
                        $("#make-like-" + post_id).html(' <i class="fa  fa-heart-o like-icon"></i> ');
                    }
                },
                error: function() {
                    alert("Error");
                }
            });
        })
    
        $('#email').on('blur', function() {
            let email = $(this).val();

            $.ajax({
                url: "check-mail", 
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email
                },
                success: function(response) {
                    if(response.exists) {
                        $('#emailStatus').text('Email already exists').css('color', 'red');
                    } else {
                        $('#emailStatus').text('Email is available').css('color', 'green');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error checking email:', error);
                }
            });
        });
});