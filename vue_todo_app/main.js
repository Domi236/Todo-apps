Vue.component('TaskList', {
  template: `
    <div>
      <h3>{{ postTitle }}</h3>
      <slot></slot>
      <input id="input"/>
      <button @click="addTask">{{ addTodo }}</button>
    </div>
  `,
  props: ['postTitle', 'addTodo'],

  methods: {
    addTask() {
      let name = document.querySelector('#input');
      if(name.value !== '') {
        app.tasks.push({name: name.value});
        name.value = '';
      }
    }
  }
});


Vue.component('Task', {
  template: `
    <div>
      <slot></slot>
    </div>
  `,
});


var app = new Vue({
  el: '#app',
  data: {
    tasks: [
      {name: 'Foo'},
      {name: 'Bar'},
      {name: 'Blag'},
      {name: 'Todo'},
      {name: 'Das'},
      {name: 'Vue'},
    ],
  },

  methods: {
    removeTask(taskToRemove) {
      app.tasks = app.tasks.filter(task =>  task.name !== taskToRemove.name)
    }
  }
});


