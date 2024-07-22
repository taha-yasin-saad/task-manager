require('./bootstrap');

// import Sortable from 'sortablejs';

// // Initialize Sortable on the element you want to make sortable
// document.addEventListener('DOMContentLoaded', () => {
//     const sortable = Sortable.create(document.getElementById('taskList'), {
//         onEnd: (event) => {
//             const order = Array.from(event.from.children).map((child) => child.dataset.id);
//             axios.post('/tasks/reorder', { order: order }).then(response => {
//                 console.log('Order updated successfully');
//             }).catch(error => {
//                 console.error('Error updating order', error);
//             });
//         }
//     });
// });

