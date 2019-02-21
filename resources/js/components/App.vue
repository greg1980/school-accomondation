<template>
  <div class="app-component">
      <p>Listing</p>
      <table class="table">
          <thead>
              <tr>
                  <th>Task Title</th>
                  <th>Priority Level</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            
              <tr>
                 <td><input type="text" id="task" class="form-control"> </td>
                 <td>
                     <select id="select" class="form-control">
                         <option>LOW</option>
                         <option>MEDIUM</option>
                         <option>HIGH</option>

                 </select>
                 </td>
                 <td><button class="btn btn-primary">Submit</button></td>
              </tr>
              
          </tbody>
      </table>
  </div>
</template>

<script>
    import TaskComponent from './Task.vue';
        export default{
            data(){
                return{
                 
                }
            },
            components:{TaskComponent}
        }
</script>

<style>
    
</style>