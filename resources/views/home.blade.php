<html>

<head>  

    <title> Todo </title>  
    <style> 
        .todo-form {
            border: solid yellow 1px;
            width: 350px;
            padding: 20px;
            margin: 0px auto;
        }

        .todo-input{
            margin-bottom:10px;
        }
        .todo-label{
            display: inline-block;
            width: 79px;
        }
        #todo-list{
            width: 350px;
            margin: 0px auto;
        }
        .todo-delete{
            color: red;
        }
        .todo-edit{
            color: green;
        }
    </style>

    

</head>


<body> 
    <form class="todo-form"> 
        
        <div class="todo-input"> 
            <label class="todo-label">  Title:   </label>
            <input type="text" class="todo-title" />
        </div>

        <div class="todo-input"> 
            <label class="todo-label">  Description:   </label>
            <input type="text" class="todo-description" />
        </div>

        <div class="todo-input"> 
            <label class="todo-label">test:</label>
            <input type="password" class="todo-test"/>
        </div>

        <div> 
            <input type="submit" value="Add Todo"/>
        </div>

    </form>


    <table border="1", id="todo-list" ></table>






    <script src="{{ asset('js/jquery.js') }}"></script>
    
    <script>
    //$('.todo-form').fadeOut();

   // $('.todo-form').click(function(){
        //$('.todo-form').fadeOut();
   // });
    </script>

<script>

$(document).click('.todo-delete', function(Tevent){
    $.ajax({
        method:'DELETE',
        url: '/api/todo/delete/'+$(Tevent.target).closest('tr').attr('data-id'),
 
    });
    //console.log($(Tevent.target).closest('tr').attr('data-id'));

});

$(document).click('')

$('.todo-form').submit(function(event){
   event.preventDefault();
   
   $.ajax({
    method: 'POST',
    url: '/api/todo/add',
    data:{
        title: $('.todo-title').val(),
        description:$('.todo-description').val(),
        test:$('.todo-test').val()
    }
   });


})

$.ajax({
    method: 'GET',
    url: '/api/todo',
}).then(function(response){
    var todoListHtml ='<tr><td>Title</td><td>Description</td><td>Test</td><td>Action</td></tr>';
    $.each(response, function(i, res){
        todoListHtml += '<tr data-id="'+res.id+'"> <td>'+res.title+'</td> <td>'+res.description+'</td> <td>'+res.test+'</td> <td><span class="todo-edit">Edit</span> | <span class="todo-delete">delete</span></td> </tr>'
    });
    $('#todo-list').html(todoListHtml); 

});






</script>

</body>

</html> 