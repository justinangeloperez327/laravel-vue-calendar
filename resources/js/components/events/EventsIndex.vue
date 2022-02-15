<template>
  <FullCalendar :options="{...calendarOptions, events: events}" />
</template>

<script>
import '@fullcalendar/core/vdom';
import FullCalendar from '@fullcalendar/vue3';
import listPlugin from '@fullcalendar/list';

import { computed } from 'vue'
import { useStore } from 'vuex'
export default {
  name: 'EventsIndex',
  components:{
    FullCalendar
  },
  setup() {
    const store = useStore()
    store.dispatch('events/getAllEvents')

    const calendarOptions ={
        plugins: [ listPlugin ],
        initialView: 'listMonth',
        events: [],
        visibleRange: {
          start: '2022-02-01',
          end: '2022-03-25'
        }
    }
    const events = computed(() => store.state.events.all)
    
    return {
      events,
      calendarOptions,
    }
  }
}
</script>

<style>

</style>