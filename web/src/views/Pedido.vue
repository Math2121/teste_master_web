<template>
  <main
    class="min-h-screen p-6 bg-purple-500 flex items-center flex-col justify-center"
  >
    <div class="container max-w-screen-lg mx-auto">
      <img
        src="../assets/logo.png"
        alt="logo master da web"
        class="w-56 mx-auto"
      />

      <div class="bg-white p-2 w-[650px] rounded mx-auto mt-2">
        <div class="text-center mt-2">
          <h2 class="text-2xl font-bold">Lista de produtos</h2>
          <p class="mt-2">Escolha uma das opções abaixo:</p>
        </div>

        <div class="text-center mt-2" v-for="item in itemsArr" :key="item.id">
          <button @click="addItemInCart(item)">
            <i
              class="fas fa-plus bg-purple-500 p-2 text-white mr-1 mb-2 rounded"
            ></i>
            {{ item.nome }}
          </button>
        </div>

        <div class="text-center mt-5">
          <h3 class="text-2xl font-bold">Checkout</h3>
          <p class="mt-2">Escolha uma das opções abaixo:</p>
        </div>
        <div
          class="text-center mt-2"
          v-for="cartItem in cart"
          :key="cartItem.id"
        >
          <button @click="removeFromCart(cartItem)">
            {{ cartItem.quantity }}x {{ cartItem.nome }}
            <i
              class="fas fa-trash bg-red-500 p-2 text-white ml-1 mb-2 rounded"
            ></i>
          </button>
        </div>

        <button
          class="w-full border-gray-300 border-2 rounded mt-5 mb-10 p-2 text-gray-500 font-bold hover:bg-purple-500 hover:text-white transition-all"
          @click="closeRequire"
        >
          <i class="fas fa-cart-shopping mr-1"></i> FECHAR PEDIDO
        </button>
      </div>
    </div>
    <p class="text-white text-center mt-2">Copyright 2023 - Master da Web</p>
  </main>
</template>

<script>
import httpClient from "../services/axios";
export default {
  components: {},
  name: "Pedido",
  data() {
    return {
      itemsArr: [],
      cart: [],
    };
  },
  created() {
    this.pegarTodosEletros();
  },
  methods: {
    pegarTodosEletros() {
      httpClient.get("produtos").then((response) => {
        console.log(response);
        this.itemsArr = response.data;
      });
    },

    addItemInCart(item) {
      const existingItem = this.cart.find(
        (cartItem) => cartItem.id === item.id
      );
      if (existingItem) {
        existingItem.quantity++;
      } else {
        this.cart.push({ ...item, quantity: 1 });
      }
    },
    removeFromCart(cartItem) {
      const index = this.cart.indexOf(cartItem);
      if (index !== -1) {
        this.cart.splice(index, 1);
      }
    },
    closeRequire() {
      let closeCart = this.cart.map(({ nome, quantity }) => ({
        nome,
        quantidade: quantity,
      }));

      try {
        for (let objeto of closeCart) {
          httpClient
            .post("produto", objeto);
        }
        this.$swal({
          title: "Pronto",
          icon: "success",
          html: `<div>Pedido feito!</div>`,
          confirmButtonText: "Ok",
          customClass: {
            confirmButton:
              "text-white transition-colors duration-200 transform bg-purple-700 rounded-md hover:bg-purple-600 w-full px-4 py-2",
          },
          buttonsStyling: false,
        });
        this.cart = []
      } catch (error) {
        console.log(error);
        this.cart = []
      }
    },
  },
};
</script>
