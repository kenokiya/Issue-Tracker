import React from "react";
import { useNavigate } from "react-router-dom";
import Bold from "../components/general/Typography/Bold";
import { Wrapper } from "../components/general/Wrapper";
import { ImageView } from "../components/issues/ImageView";
import NormalLayout from "../components/NormalLayout";

export const CreateIssue = () => {
  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();

    navigate("/my_issues");
  };
  return (
    <NormalLayout navigation={{ title: "Create Issue", showBack: true }}>
      <Wrapper className="mx-2">
        <form className="flex flex-col gap-2 px-2" onSubmit={handleSubmit}>
          <div className="flex flex-col gap-2">
            <Bold htmlFor="">Issue</Bold>

            <textarea
              id="issue_description"
              rows="4"
              placeholder="Enter issue description"
              className="rounded-xl p-2 bg-yellow-light"
            />
          </div>

          <div className="flex flex-col gap-2">
            <Bold className="text-sm"> Service</Bold>

            <input className="h-12 bg-yellow-light rounded-xl" />
          </div>

          <div className="flex flex-col gap-2">
            <Bold className="text-sm">Tag Someone</Bold>

            <input className="h-12 bg-yellow-light rounded-xl" />
          </div>

          <div className="grid py-2 grid-cols-3 sm:grid-cols-4">
            {/* images */}
            <ImageView />
            <ImageView />
            <ImageView />
            <ImageView />
            <ImageView />
          </div>
          <button
            type="button"
            className={`py-2 rounded-xl text-xs font-bold text-yellow bg-yellow-light w-48 mx-auto`}
          >
            Upload Image
          </button>

          <button
            type="submit"
            className={`py-3 rounded-xl font-bold bg-yellow text-white w-5/6 mx-auto mt-3`}
          >
            Post Issue
          </button>
        </form>
      </Wrapper>
    </NormalLayout>
  );
};
