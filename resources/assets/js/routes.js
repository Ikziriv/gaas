import VueRouter from 'vue-router';

let routes=[
{
 	path:'/', 
 	component:require('./components/order/FormOrder')
}
];

export default new VueRouter({
	routes
});