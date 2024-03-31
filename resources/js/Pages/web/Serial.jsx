import Layout from "../../Components/Web/Layout.jsx";
import DOMPurify from "isomorphic-dompurify";

const stats = [
    { label: 'Hodnocení', value: '2021' },
    { label: 'Počet recenzí', value: '37' },

]


const posts = [
    {
        id: 1,
        title: 'Boost your conversion rate',
        href: '#',
        description:
            'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel iusto corrupti dicta laboris incididunt.',
        date: 'Mar 16, 2020',
        datetime: '2020-03-16',
        category: { title: 'Marketing', href: '#' },
        author: {
            name: 'Michael Foster',
            role: 'Co-Founder / CTO',
            href: '#',
            imageUrl:
                'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    // More posts...
]


export default function Serial({ serial, description }) {
    const clean = DOMPurify.sanitize(description);

    {console.log(serial)}
    return (

        <Layout title={serial.name}>
            <div className="bg-white py-24 sm:py-32">
                <div className="mx-auto max-w-7xl px-6 lg:px-8">
                    <div className="mx-auto grid max-w-2xl grid-cols-1 items-start gap-x-8 gap-y-16 sm:gap-y-24 lg:mx-0 lg:max-w-none lg:grid-cols-2 min-h-[650px]">
                        <div className="lg:pr-4 h-full min-h-fit">
                            <div className="relative overflow-hidden rounded-3xl bg-gray-900 px-6 pb-9 pt-64 shadow-2xl sm:px-12 lg:max-w-lg lg:px-8 lg:pb-8 xl:px-10 xl:pb-10 h-full">
                                <img
                                    className="absolute inset-0 h-full w-full object-fit brightness-125 saturate-0"
                                    src={"/storage/shows/" +  serial.icon}
                                    alt=""
                                />

                            </div>
                        </div>
                        <div>
                            <div className="text-base leading-7 text-gray-700 lg:max-w-lg">
                                <h1 className="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                    { serial.name }
                                </h1>
                                <div className="max-w-xl">
                                    <p dangerouslySetInnerHTML={{__html: clean}}  className="mt-6">
                                    </p>

                                </div>
                            </div>
                            <dl className="mt-10 grid grid-cols-2 gap-8 border-t border-gray-900/10 pt-10 sm:grid-cols-4">
                                {stats.map((stat, statIdx) => (
                                    <div key={statIdx}>
                                        <dt className="text-sm font-semibold leading-6 text-gray-600">{stat.label}</dt>
                                        <dd className="mt-2 text-3xl font-bold leading-10 tracking-tight text-gray-900">{stat.value}</dd>
                                    </div>
                                ))}
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div className="bg-white py-24 sm:py-32">
                <div className="mx-auto max-w-7xl px-6 lg:px-8">
                    <div className="mx-auto max-w-2xl">
                        <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Recenze</h2>

                        <div className="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                            {posts.map((post) => (
                                <article key={post.id} className="flex max-w-xl flex-col items-start justify-between">
                                    <div className="flex items-center gap-x-4 text-xs">
                                        <time dateTime={post.datetime} className="text-gray-500">
                                            {post.date}
                                        </time>
                                        <a
                                            href={post.category.href}
                                            className="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                                        >
                                            {post.category.title}
                                        </a>
                                    </div>
                                    <div className="group relative">
                                        <h3 className="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href={post.href}>
                                                <span className="absolute inset-0" />
                                                {post.title}
                                            </a>
                                        </h3>
                                        <p className="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{post.description}</p>
                                    </div>
                                    <div className="relative mt-8 flex items-center gap-x-4">
                                        <img src={post.author.imageUrl} alt="" className="h-10 w-10 rounded-full bg-gray-50" />
                                        <div className="text-sm leading-6">
                                            <p className="font-semibold text-gray-900">
                                                <a href={post.author.href}>
                                                    <span className="absolute inset-0" />
                                                    {post.author.name}
                                                </a>
                                            </p>
                                            <p className="text-gray-600">{post.author.role}</p>
                                        </div>
                                    </div>
                                </article>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    )
}