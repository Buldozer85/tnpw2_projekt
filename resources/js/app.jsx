import { createInertiaApp } from '@inertiajs/react'
import { createRoot } from 'react-dom/client'

document.querySelector('#app').classList.add('h-full')

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob(['./Pages/**/*.jsx', './Components/**/*.jsx' ], { eager: true })

        if(!pages[`./Pages/web/${name}.jsx`]) {
            return pages[`./Components/${name}.jsx`]
        }
        return pages[`./Pages/web/${name}.jsx`]

    },
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />)
    },
})
