import Layout from "../../Components/Web/Layout.jsx";
import Serial from "./Serial.jsx";
import {ShowWidget} from "../../Components/Web/ShowWidget.jsx";
import Pagination from "../../Components/Web/Pagination.jsx";

export default function Series({ series, loggedUser }) {
    console.log(series)
    return (
        <Layout loggedUser={loggedUser} title="Seriály">
            <h1 className={"text-center mt-16 font-bold text-5xl"}>Všechny seriály</h1>
            <main className="mt-32 max-w-[1200px] mx-auto">
                <div className="grid gap-y-4 md:grid-cols-3 gap-x-8 px-12">
                    {series.data.map((item) => (
                        <ShowWidget key={item.id} show={item}/>
                    ))}
                </div>

                <Pagination pagination={series.links}/>
            </main>



        </Layout>
    )
}