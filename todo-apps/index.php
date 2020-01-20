<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
</head>

<style>
  li {
    display: flex;
  }
</style>

<body>

  <h1>Todo List</h1>

  <ul id="todoList">
  </ul>
  <input id="input"/>
  <button id="btn" onClick="addTodo()">+</button>


  <script>

    document.body.onload = createTodos;

    let todoList = document.getElementById("todoList"); 

    let todos = ['foo', 'Js', 'PHP', 'Bar'];

    function createTodos() {
      while (todoList.hasChildNodes()) { 
        todoList.removeChild(todoList.firstChild); 
      } 
      
      for (let i = 0; i < todos.length; i++ ) {

        let todoContainer = document.createElement('li');
        let todoElement = document.createElement('div');
        todoContainer.appendChild(todoElement);

        let todoContent = document.createTextNode(todos[i]);
        todoElement.appendChild(todoContent);

        let closeBtn = document.createElement('span');
        let closeBtnContent = document.createTextNode('   -');
        closeBtn.appendChild(closeBtnContent);
        closeBtn.className = 'close';
        todoContainer.appendChild(closeBtn);

        todoList.appendChild(todoContainer);

        removeTodo(closeBtn, todoElement);
      }
    }

    function addTodo() {
      let input = document.getElementById("input").value; 
      todos.push(input);
      document.getElementById("input").value = ''; 

      createTodos();
    }

    function removeTodo(closeBtn, todoElement) {

      closeBtn.addEventListener('click', () => {

        closeBtn.parentNode.style.display = 'none';
        todos.splice( todos.indexOf(todoElement.textContent), 1 );
      })
    }


//     ["bar", "baz", "foo", "foo", "qux"]
 
// for( var i = list.length-1; i--;){
// if ( list[i] === 'foo') list.splice(i, 1);
// }
 
// ["bar", "baz", "qux"]


  </script>

</body>

</html>