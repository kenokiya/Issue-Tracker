import { BsPlusLg } from "react-icons/bs";
import { RiSendPlaneFill } from "react-icons/ri";

export const Field = () => {
  return (
    <input type="text" className="h-full w-full bg-yellow-light rounded-3xl " />
  );
};

export const Input = () => {
  return (
    <div className="relative h-12 my-1">
      <Field />
      {/* send button */}
      <button className="absolute right-0 top-0 h-full px-2 text-yellow bg-yellow-light text-2xl rounded-r-3xl">
        <RiSendPlaneFill />
      </button>
      <button className="h-full w-12 bg-yellow-light flex items-center justify-center rounded-full absolute top-0 ">
        <BsPlusLg className="text-xl" />
      </button>
    </div>
  );
};
