import React from "react";
import { AdminLayout } from "../components/admin/AdminLayout";
import Bold from "../components/general/Typography/Bold";
import { Wrapper } from "../components/general/Wrapper";
import { RoundedYellow } from "../components/issues/RoundedYellow";

export const ViewSingleUser = () => {
  return (
    <AdminLayout navigation={{ title: "User", showBack: true }}>
      {/* User Card */}
      <UserCard />
    </AdminLayout>
  );
};

const UserCard = () => (
  <Wrapper className="flex flex-col gap-4">
    {/* header */}
    <div className="flex justify-center gap-5">
      <RoundedYellow />

      <div className="w-6/12 flex flex-col ">
        <Bold className="">Robert Mwalugha</Bold>

        <Status status="Active" />
      </div>
    </div>

    {/* body */}
    <div className="flex flex-col gap-2">
      <div className="flex justify-start gap-5  w-3/4 mx-auto">
        <Bold className="text-sm">Username: </Bold>
        <span className="text-sm">Robert Mwalugha</span>
      </div>{" "}
      <div className="flex justify-start w-3/4 mx-auto gap-5">
        <Bold className="text-sm">Password: </Bold>
        <span className="text-sm">******</span>
      </div>{" "}
      <div className="flex justify-start gap-5  w-3/4 mx-auto">
        <Bold className="text-sm">Activated: </Bold>
        <span className="text-sm">12.30pm 12 Oct 2020</span>
      </div>
    </div>

    <div className="py-3 flex justify-end px-5 gap-3">
      <button className=" border border-red-600 text-red-600 px-2 rounded-lg h-8 font-bold text-xs">
        Delete
      </button>

      <button className=" bg-red-100 text-red-600 px-2 rounded-lg h-8 font-bold text-xs">
        Deactivate
      </button>
    </div>
  </Wrapper>
);

const Status = ({ status }) =>
  status === "active" ? (
    <span className="text-success-green text-xs font-medium">Active</span>
  ) : (
    <span className="text-red-500 text-xs font-medium">Deactivated</span>
  );
