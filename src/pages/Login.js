import React from "react";
import Bold from "../components/general/Typography/Bold";
import NormalText from "../components/general/Typography/NormalText";

export const Login = () => {
  return (
    <div className="flex flex-col items-center justify-center h-screen gap-5 px-3">
      <Bold className="text-3xl">Welcome Back</Bold>
      <NormalText>
        Login into your account to <br /> create and manage issues
      </NormalText>

      <div className="w-full flex flex-col gap-2">
        {/* email input */}
        <div className="flex flex-col gap-2">
          <label className=" font-medium">Username:</label>

          <input
            type="text"
            className="bg-yellow-light h-12 rounded-3xl focus:outline-yellow"
          />
        </div>
        {/* password input */}
        <div className="flex flex-col gap-3">
          <label className=" font-medium">Password:</label>

          <input
            type="password"
            className="bg-yellow-light h-12 rounded-3xl focus:outline-yellow"
          />
        </div>
      </div>

      <button className="bg-yellow text-white font-bold p-2.5 w-3/4 text-lg rounded-2xl">
        Log in
      </button>
    </div>
  );
};
