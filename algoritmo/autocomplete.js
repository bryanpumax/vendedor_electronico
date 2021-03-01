var options = {
        url: "algoritmo/modelo.php?dato=auto",

        getValue: "nombre_producto", 

        template: {
                type: "custom",
              method: function(value,item) {
   return '<img  style="height: 100px;width: 100px;object-fit: fill;" src="'+ item.ruta + '" />'+"\t"+ value;
              }
        },

        list: {
                match: {
                        enabled: true
                }
        }
        ,theme: "boostrap"
};

$("#searchs").easyAutocomplete(options);
