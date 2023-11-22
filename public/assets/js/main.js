
const user = {
  id: sessionStorage.id,
  token: sessionStorage.token,
  bilhete_identidade: sessionStorage.bilhete_identidade ,
  name: sessionStorage.name,
  telefone: sessionStorage.telefone,
  email: sessionStorage.email,
  nick_name: sessionStorage.nick_name,
  address: sessionStorage.address,
  role: sessionStorage.role,
  is_banned: sessionStorage.is_banned,
  created_at: sessionStorage.created_at,
  updated_at: sessionStorage.updated_at,
  is_driver: sessionStorage.is_driver,
  online: sessionStorage.online
};

// Configurar intervalo para fazer chamadas a cada 2 segundos
const intervalo = 1000; // 
//setInterval(function(){location.reload()}, intervalo);
//setInterval(fazerRequisicao, intervalo);

// verificar se user está logado
  if (!user.online){
     location.href = '/login'
  }


const functions = {
  logout: function () {
    sessionStorage.clear();
    location.reload();
  },

  getUnapprovedDrivers: async function(){
    const options = {
      method: 'GET',
      headers: {
        /* 'User-Agent': 'insomnia/2023.5.8', */
        Authorization: 'Bearer ' + user.token
      }
    };

    await fetch(endpoins.api + endpoins.newdrivers, options)
      .then(response => response.json())
      .then(response =>{
        try {
          const tableBody = document.getElementById("unapproveddivres");

          response.drivers.forEach(item => {
            const row = document.createElement("tr");
            row.innerHTML = `
              <td class="">1</td>
              <td>${item.user.name}</td>
              <td>${item.user.bilhete_identidade}</td>
              <td>999999999</td>
              <td>${item.user.email}</td>
              <td>
                <a class="btn btn-info" href="/drivers/${item.user.bilhete_identidade}">
                <i class="bx bx-show text-center"></i>
                </a>
              </td>`;
            tableBody.appendChild(row);
          });
          console.log(response);



        } catch (error) {
          
        }
      })
      .catch(err => console.error(err));
  },
};



(function () {
  document.addEventListener('DOMContentLoaded', async function () {
    
    document.getElementById('user-name').innerHTML = user.name;
    document.getElementById('user-role').innerHTML = "Admin";//passar para o que vem da db;
    //functions.getUnapprovedDrivers();
  });
  "use strict";
})();

/* 
const main_vue = new Vue({
  el: '#app',
  data() {
    return {
      
    }
  },
}) */

/* const header_vue = new Vue({
  el: '#header',
  data() {
    return {

    }
  },
})
 */