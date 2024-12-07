import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],


    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    daisyui: {
		themes: [
			{
				mytheme: {
					primary: '#800000',
					secondary: '#f1c40e',
					accent: '#ff7566',
					neutral: '#070708',
					base: '#f9f9fb',
					'base-100': '#fafbff',
					info: '#38bdf8',
					success: '#a3e635',
					warning: '#eab308',
					error: '#ef4444',
				},
			},
		],
	},


    plugins: [forms, require("daisyui")],
};
