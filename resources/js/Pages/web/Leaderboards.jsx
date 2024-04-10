import Layout from "../../Components/Web/Layout.jsx";
import {useState} from "react";
import Leaderboard from "../../Components/Web/Leaderboard.jsx";

export default function Leaderboards({moviesRanking, seriesRanking, loggedUser}) {
    const [selectedLeaderBoard, setSelectedLeaderboard] = useState('series')


    return (
      <Layout loggedUser={loggedUser} title={"Žebříčky"}>
          <main className={"max-w-7xl mx-auto mt-12"}>
              <div className={"flex flex-row gap-x-4 px-4 sm:px-6 lg:px-8"}>
                  <button onClick={() => setSelectedLeaderboard('movies')} className={"bg-gray-900 px-4 p-2 text-white rounded-lg" + ((selectedLeaderBoard === 'movies') ? ' bg-gray-600' : '')}>Filmy</button>
                  <button onClick={() => setSelectedLeaderboard('series')} className={"bg-gray-900 px-4 p-2 text-white rounded-lg" + ((selectedLeaderBoard === 'series') ? ' bg-gray-600' : '')}>Seriály</button>
              </div>

              {selectedLeaderBoard === 'movies' &&
                <div>
                  <Leaderboard shows={moviesRanking.data}/>
                </div>
              }

              {selectedLeaderBoard === 'series' &&
                  <div>
                      <Leaderboard shows={seriesRanking.data}/>
                  </div>
              }

          </main>

      </Layout>
    );
}