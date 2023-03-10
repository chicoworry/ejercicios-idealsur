import Head from "next/head";
import { useState } from "react";
import HelperIP from "@/components/HerperIP";

type WeatherData = {
    temperature: number,
    icon_href: string
}

export default function Home() {
    const [clientIP, setClientIP] = useState("");
    const [loading, setLoading] = useState(false);
    const [weatherData, setWeatherData] = useState<WeatherData>();

    const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        const request = await fetch("/api/weather", {
            method: 'POST',
            body: JSON.stringify({
                IP: clientIP
            })
        });

        const data: WeatherData = await request.json();

        setWeatherData(data);
    }

    return (
        <>
            <Head>
                <title>Ejercicio APIs</title>
                <meta name="description" content="Generated by create next app" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="icon" href="/favicon.ico" />
            </Head>
            <main className="flex justify-center items-center min-h-screen">
                <div className="bg-white-300 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10 border border-gray-100/50 p-10">
                    <div className="font-bold text-2xl text-center text-white">Ingrese su IP</div>
                    <HelperIP/>
                    <form 
                        method="POST"
                        className="flex flex-col justify-center"
                        onSubmit={handleSubmit}
                    >
                        <input
                            type="text"
                            className="
                                bg-transparent
                                border border-white rounded-md
                                outline-none
                                text-center text-white font-semibold
                                placeholder:text-white/10
                                p-2 mb-2 w-full"
                            placeholder="IPv4 o IPv6"
                            onChange={(e) => setClientIP(e.target.value)}
                        />
                        <button
                            type="submit"
                            className="
                                bg-indigo-600 hover:bg-indigo-700
                                rounded-md
                                text-white
                                px-3 py-2 w-1/2 mx-auto"
                        >
                            Enviar
                        </button>
                    </form>
                    { weatherData &&
                        <div className="mt-5 text-center">
                            <p className="inline-flex font-bold text-white">
                                Cerca tuyo hay {weatherData.temperature}??C
                                <img src={weatherData.icon_href} alt="" className="w-7 h-7 align-baseline"/>
                            </p>
                        </div>
                    }
                </div>
            </main>
        </>
    )
}
