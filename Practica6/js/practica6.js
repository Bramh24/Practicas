// Crear un objeto con instancia de vue

var app = new Vue({
	el : '#app',
	data:{
		mensaje : ''
	},
  	methods: {
      	reverseMessage: function () {
     	if(isNaN(this.mensaje)){
       	//el split separa
      		return this.mensaje.split('').reverse().join('')
     	}else if(this.mensaje==""){
        	return ""
     	}else{
      		return "No se pueden mostrar numeros alreves"
     	}
    },
      	may:function(){
        	if(isNaN(this.mensaje)){
          	//el toUpperCase
          		return this.mensaje.toUpperCase()
        	}else if(this.mensaje==""){
          		return ""
        	}else{
          		return "No se pueden mostrar numeros en mayusculas"
        	}
      	}
    }

  })