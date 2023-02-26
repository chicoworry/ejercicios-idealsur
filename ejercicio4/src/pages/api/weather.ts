// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import type { NextApiRequest, NextApiResponse } from "next";

const API_KEY = process.env.WEATHER_API_KEY;

type Data = {
    temperature: number,
    icon_href: string
}

type Error = {
    message: string
}

type WeatherData = {
    current: {
        temp_c: number,
        condition: {
            icon: string
        }
    }
}

export default async function handler(
    req: NextApiRequest,
    res: NextApiResponse<Data | Error>
) {
    const { IP } = JSON.parse(req.body);

    try {
        const request = await fetch(`https://api.weatherapi.com/v1/current.json?key=${API_KEY}&q=${IP}`);

        const data: WeatherData = await request.json();

        return res.status(200).json({
            temperature: data.current.temp_c,
            icon_href: data.current.condition.icon
        });

    } catch (error) {
        console.error("We fuck it? ", error);

        return res.status(500).json({
            message: "No weather data for you"
        });
    }
}
