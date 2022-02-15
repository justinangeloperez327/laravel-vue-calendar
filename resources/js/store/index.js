import { createStore } from 'vuex'

import events from './modules/events'


export default createStore({
  modules: {
    events,
  },
})