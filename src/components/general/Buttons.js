export const ActionButton = ({ children, className }) => {
  return (
    <button className={`py-2 rounded-xl  text-xs font-bold ${className}`}>
      {children}
    </button>
  );
};

export const EditButton = ({ children }) => {
  return (
    <ActionButton className={`text-yellow bg-yellow-light w-24`}>
      {children}
    </ActionButton>
  );
};

export const CompleteButton = ({ children }) => {
  return (
    <ActionButton className={`text-success-green bg-green-light w-24`}>
      {children}
    </ActionButton>
  );
};
