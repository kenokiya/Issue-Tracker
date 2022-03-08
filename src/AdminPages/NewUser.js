import React from "react";
import { AdminLayout } from "../components/admin/AdminLayout";
import Bold from "../components/general/Typography/Bold";

export const NewUser = () => {
  return (
    <AdminLayout navigation={{ title: "Reports" }}>
      <form action="" className="p-5 flex flex-col gap-3">
        <div className="text-center">
          <span className="text-xl font-medium">New User</span>
        </div>
        <div className="flex flex-col gap-2">
          <Bold className="text-sm"> Username</Bold>

          <input className="h-12 bg-yellow-light rounded-xl" />
        </div>

        <div className="flex flex-col gap-2">
          <Bold className="text-sm">Password</Bold>

          <input className="h-12 bg-yellow-light rounded-xl" />
        </div>

        <button
          type="submit"
          className={`py-3 rounded-xl font-bold bg-yellow text-white w-5/6 mx-auto mt-5`}
        >
          Add User
        </button>
      </form>
    </AdminLayout>
  );
};
