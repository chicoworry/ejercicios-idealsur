import { useState, useEffect } from "react";

const HelperIP = () => {
    const [clientIP, setClientIP] = useState("");
    const [isLoading, setLoading] = useState(false)

    useEffect(() => {
        setLoading(true);
        fetch("https://wtfismyip.com/json")
            .then((res) => res.json())
            .then((data) => {
                setTimeout(() => {
                    setClientIP(data["YourFuckingIPAddress"] as string);
                    setLoading(false);
                }, 2000);
            });
    }, []);

    if (isLoading) return <div className="bg-white/10 text-white text-center rounded-md py-1 px-2 my-2">Cargando datos de IP...</div>
    if (!clientIP) return <div className="bg-white/10 text-white text-center rounded-md py-1 px-2 my-2">No encontramos su IP</div>

    return (
        <div className="bg-white/10 text-white text-center rounded-md py-1 px-2 my-2">Puede que su IP sea <span className="font-semibold">{clientIP}</span></div>
    )
}

export default HelperIP;