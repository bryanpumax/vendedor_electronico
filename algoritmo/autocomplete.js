var options = {
        url: "algoritmo/modelo.php?dato=auto",

        getValue: "nombre_producto", 

        template: {
                type: "custom",
              method: function(value,item) {
   return '<img  style="width: 30%;" src="'+ item.ruta + '" />'+"\t"+ value;
              }
        },

        list: {
                match: {
                        enabled: true
                }
        }
        ,theme: "dark"
};

$("#searchs").easyAutocomplete(options);
