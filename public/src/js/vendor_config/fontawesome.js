import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'

library.add(fas, far);

// Kicks off the process of finding <i> tags and replacing with <svg>
dom.watch();
