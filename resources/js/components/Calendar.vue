<template>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-3">
        <event-form></event-form>
      </div>
      <div class="col-md-9">
        <event-calendar></event-calendar>
      </div>
    </div>
  </div>
</div>
</template>
<script >
import EventForm from './events/EventsCreate.vue'
import EventCalendar from './events/EventsIndex.vue'
export default{
  components: {
    EventForm, EventCalendar
  }
}
</script>
<style >
.fc-list-item-time {
  display:none;
}
.fc-list-event-time {
  display:none;
}
</style>