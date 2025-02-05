<style>
.order-rm {
  position: absolute;
  margin-left: -15px;
}
</style>
<template>
  <div class="container py-4">
    <div class="row">
      <div
        :class="{
          'col-md-9': purchases.length > 0,
          'col-md-12': purchases.length == 0,
        }"
      >
        <div class="row">
          <div class="col-md-4" v-for="item in items" :key="item.id">
            <div class="card mb-3">
              <img
                class="card-img-top"
                src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title text-capitalize">
                  {{ item.name }}
                </h5>
                <p
                  class="font-weight-bold text-primary"
                  style="font-size: 18px"
                >
                  $ {{ item.price }}
                </p>
                <p class="card-text">
                  {{ item.description }}
                </p>
                <a
                  href="#"
                  @click.prevent="addToCart(item)"
                  class="btn btn-primary"
                >
                  <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" v-if="purchases.length > 0">
        <h4>Orders</h4>
        <table class="table">
          <tbody>
            <tr v-for="(pur, index) in purchases" :key="index">
              <th>
                <a
                  href="#"
                  @click.prevent="onRemoveOrder(pur)"
                  class="order-rm text-danger"
                >
                  <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <p class="mb-0">
                  {{ pur.product.name }}
                </p>
                ${{ pur.product.price }} x {{ pur.total_quantity }}
              </th>
              <th class="text-right">$ {{ pur.total_price }}</th>
            </tr>
          </tbody>
          <tfoot class="mt-3">
            <tr>
              <th>
                <strong>TOTAL</strong>
              </th>
              <th class="text-right">
                <strong> $ {{ _total() }}</strong>
              </th>
            </tr>
          </tfoot>
        </table>

        <button class="btn btn-primary">PAY</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      items: [],
      purchases: [],
    };
  },
  mounted() {
    this.loadProducts();
    this.loadPurchases();
  },
  methods: {
    loadProducts() {
      axios.get("/all-products").then((resp) => {
        this.items = resp.data;
      });
    },

    addToCart(item) {
      axios
        .post("/add-to-cart", {
          product_id: item.id,
        })
        .then((resp) => {
          this.loadPurchases();
        });
    },

    loadPurchases() {
      axios.get("/get-purchases").then((resp) => {
        this.purchases = resp.data;
      });
    },

    onRemoveOrder(item) {
      axios
        .post("/remove-to-cart", {
          product_id: item.product_id,
        })
        .then((resp) => {
          this.loadPurchases();
        });
    },

    _total() {
      let total = this.purchases.reduce(
        (accumulator, item) => accumulator + item.total_price,
        0
      );

      return total.toFixed(2);
    },
  },
};
</script>

<style>
</style>
