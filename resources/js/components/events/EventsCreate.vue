<template>
  <form @submit.prevent="saveEvent()">
    <div class="mb-3">
      <label for="eventFormEventTitleInput" class="form-label">Event</label>
      <input type="text" class="form-control" id="eventFormEventTitleInput" placeholder="" v-model="form.title" autofocus>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <label for="eventFormEventDateFromInput" class="form-label">From</label>
          <input type="date" class="form-control" id="eventFormEventDateFromInput" placeholder="" v-model="form.date_from">
        </div>
        <div class="col-6">
          <label for="eventFormEventDateToInput" class="form-label">To</label>
          <input type="date" class="form-control" id="eventFormEventDateToInput" placeholder="" v-model="form.date_to">
        </div>
      </div>
    </div>
    <div class="form-check form-check-inline mb-3" v-for="(day, index) in weekdays" :key="index">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" :value="day.value" v-model="form.days">
      <label class="form-check-label" for="inlineCheckbox1">{{ day.text }}</label>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</template>

<script>
import { reactive } from 'vue'
import { useStore } from 'vuex'
export default {
  name: 'EventsCreate',
  setup(){
    const store = useStore()
    
    const weekdays = [
        { text: 'Mon', value: 1 },
        { text: 'Tue', value: 2 },
        { text: 'Wed', value: 3 },
        { text: 'Thu', value: 4 },
        { text: 'Fri', value: 5 },
        { text: 'Sat', value: 6 },
        { text: 'Sun', value: 7 },
    ]
    const form = reactive ({
      days: [],
      date_from: null,
      date_to: null,
      title: null,
    })

    return{
      form,
      weekdays,
      saveEvent: () => store.dispatch('events/createEvent', {...form})
    }
  }
}
</script>

<style>

</style>