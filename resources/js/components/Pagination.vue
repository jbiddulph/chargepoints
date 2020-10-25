<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li :class="[{disabled: !pagination.prev_page_url}]"><a class="page-link" href="#" @click="fetchPoints(pagination.prev_page_url)">Previous</a></li>
          <li :class="[{disabled: !pagination.next_page_url}]"><a class="page-link" href="#" @click="fetchPoints(pagination.next_page_url)">Next</a></li>
        </ul>
      </nav>
</template>